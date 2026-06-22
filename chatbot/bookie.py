from flask import Flask, request, jsonify
import joblib
import re
import nltk
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.preprocessing import LabelEncoder
from sklearn.metrics import accuracy_score
from flask_cors import CORS

nltk.download('words')
from nltk.corpus import words as nltk_words

# Load the dataset
data = pd.read_excel('nourish_bakery.xlsx')

# Clean the 'User Inputs' column
data['User Inputs'] = data['User Inputs'].str.lower().str.replace(r'[^\w\s]', '', regex=True)

# Process the 'Chatbot Response' column for training
X = data['User Inputs']
y = data['Chatbot Response']

# Encode the labels (chatbot responses)
label_encoder = LabelEncoder()
y_encoded = label_encoder.fit_transform(y)

# Vectorize the text data and train-test split
count_vectorizer = CountVectorizer()
X_vectorized = count_vectorizer.fit_transform(X)
X_train, X_test, y_train, y_test = train_test_split(X_vectorized, y_encoded, test_size=0.2, random_state=42)

# Train the model
best_model = LogisticRegression()
best_model.fit(X_train, y_train)

# Test the model accuracy
y_pred = best_model.predict(X_test)
print(f"Model Accuracy: {accuracy_score(y_test, y_pred)}")

# Save the model and other objects
joblib.dump(best_model, 'best_model.joblib')
joblib.dump(count_vectorizer, 'count_vectorizer.joblib')
joblib.dump(label_encoder, 'label_encoder.joblib')

# Initialize Flask app
app = Flask(__name__)
CORS(app)

# Function to predict user input
def predict_user_input(user_input):
    user_input = count_vectorizer.transform([user_input])
    predicted_class = best_model.predict(user_input)[0]
    predicted_value = label_encoder.inverse_transform([predicted_class])[0]
    return predicted_value.strip()

# Function to check if the user input is meaningful
def is_meaningful_word(user_input):
    words_set = set(nltk_words.words())
    custom_words = {'nourishbakery', 'goodbye'}
    combined_words = words_set.union(custom_words)

    cleaned_input = re.sub(r'\W+', " ", user_input)
    input_words = cleaned_input.lower().split()

    for word in input_words:
        if word not in combined_words:
            input_words.remove(word)
    return len(input_words) > 0

# Function to get chatbot response
def chatbot_response(user_input):
    if not is_meaningful_word(user_input):
        return "Please enter a meaningful word."
    return predict_user_input(user_input)

# Endpoint to handle chat requests
@app.route('/chat', methods=['POST'])
def chat():
    user_input = request.json['user_input']
    if user_input.lower() == 'stop':
        return jsonify({"response": "Goodbye! The conversation has ended."})
    
    response = chatbot_response(user_input)
    return jsonify({"response": response})

# Run the Flask app
if __name__ == '__main__':
    app.run(debug=True, port=5000)  # Flask runs on port 5000 by default