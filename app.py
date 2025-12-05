from flask import Flask, send_from_directory
import os

app = Flask(__name__)

# Get the directory where app.py is located
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
SRC_DIR = os.path.join(BASE_DIR, 'src')
IMAGES_DIR = os.path.join(BASE_DIR, 'images')

@app.route('/')
def index():
    return send_from_directory(SRC_DIR, 'index.html')

@app.route('/<path:filename>')
def serve_file(filename):
    # Try to serve from src directory first
    if os.path.exists(os.path.join(SRC_DIR, filename)):
        return send_from_directory(SRC_DIR, filename)
    # If not found in src, try images directory
    elif os.path.exists(os.path.join(IMAGES_DIR, filename)):
        return send_from_directory(IMAGES_DIR, filename)
    # Otherwise return 404
    return "File not found", 404

@app.route('/images/<path:filename>')
def serve_image(filename):
    return send_from_directory(IMAGES_DIR, filename)

if __name__ == '__main__':
    print("Starting server on http://localhost:5001")
    print(f"Serving files from: {SRC_DIR}")
    app.run(host='0.0.0.0', port=5001, debug=True)
