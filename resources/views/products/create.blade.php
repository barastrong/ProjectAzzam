<style>
/* Form Container */
form {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2.5rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Form Groups */
.form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

/* Labels */
label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 600;
    color: #333;
    font-size: 0.95rem;
}

/* Common Input Styles */
input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 1.5px solid #e1e1e1;
    border-radius: 8px;
    font-size: 1rem;
    color: #333;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

/* Focus States */
input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus {
    outline: none;
    border-color: #4a90e2;
    background: white;
    box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
}

/* Textarea Specific */
textarea {
    min-height: 120px;
    resize: vertical;
    line-height: 1.5;
}

/* Number Input Specific */
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
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
}

button[type="submit"]:hover {
    background-color: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.2);
}

button[type="submit"]:active {
    transform: translateY(0);
    box-shadow: none;
}

/* Placeholder Styling */
::placeholder {
    color: #999;
    opacity: 0.7;
}

/* Required Field Indicator */
label::after {
    content: ' *';
    color: #e74c3c;
}

/* Error State */
input:invalid,
textarea:invalid {
    border-color: #e74c3c;
}

/* Hover States */
input:hover,
textarea:hover {
    border-color: #999;
}

/* Disabled State */
input:disabled,
textarea:disabled {
    background-color: #f5f5f5;
    cursor: not-allowed;
    opacity: 0.7;
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        margin: 1rem;
        padding: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        padding: 0.75rem;
        font-size: 16px; /* Prevents zoom on mobile */
    }

    button[type="submit"] {
        padding: 0.875rem;
    }
}

/* Loading State for Submit Button */
button[type="submit"].loading {
    background-color: #ccc;
    cursor: wait;
    opacity: 0.8;
}

/* Success Feedback */
.form-group.success input,
.form-group.success textarea {
    border-color: #2ecc71;
}

/* Form Header (if needed) */
.form-header {
    margin-bottom: 2rem;
    text-align: center;
}

.form-header h2 {
    color: #333;
    font-size: 1.5rem;
    font-weight: 600;
}
</style>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Deskripsi</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Harga</label>
    <input type="number" name="price" id="price" required>

    <label for="stock">Stok</label>
    <input type="number" name="stock" id="stock" value="0" required>

    <button type="submit">Simpan</button>
</form>
