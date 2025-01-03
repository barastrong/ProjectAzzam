<style>
    /* Form Container */
form {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

/* Form Groups */
.form-group {
    margin-bottom: 1.5rem;
}

/* Labels */
label {
    display: block;
    margin-bottom: 0.5rem;
    color: #1a237e;
    font-weight: 600;
    font-size: 0.95rem;
}

/* Input Fields */
input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    color: #424242;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus {
    outline: none;
    border-color: #1a237e;
    box-shadow: 0 0 0 3px rgba(26, 35, 126, 0.1);
    background-color: white;
}

/* Textarea specific styling */
textarea {
    min-height: 120px;
    resize: vertical;
}

/* Number input specific styling */
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Submit Button */
button[type="submit"] {
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, #1a237e, #3949ab);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
    box-shadow: 0 4px 6px rgba(26, 35, 126, 0.2);
}

button[type="submit"]:hover {
    background: linear-gradient(135deg, #3949ab, #1a237e);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(26, 35, 126, 0.3);
}

/* Error states */
input:invalid,
textarea:invalid {
    border-color: #f44336;
}

/* Placeholder styling */
::placeholder {
    color: #9e9e9e;
    opacity: 0.7;
}

/* Required field indicator */
label::after {
    content: '*';
    color: #f44336;
    margin-left: 4px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    form {
        margin: 1rem;
        padding: 1.5rem;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        font-size: 16px; /* Prevents zoom on mobile */
        padding: 0.625rem 0.875rem;
    }

    button[type="submit"] {
        padding: 0.875rem;
    }
}

/* Animation for focus states */
@keyframes focusAnimation {
    0% { transform: scale(1); }
    50% { transform: scale(1.02); }
    100% { transform: scale(1); }
}

input:focus,
textarea:focus {
    animation: focusAnimation 0.3s ease;
}
</style>
<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}" required>

    <label for="description">Deskripsi</label>
    <textarea name="description" id="description" required>{{ $product->description }}</textarea>

    <label for="price">Harga</label>
    <input type="number" name="price" id="price" value="{{ $product->price }}" required>

    <label for="stock">Stok</label>
    <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>

    <button type="submit">Simpan</button>
</form>
