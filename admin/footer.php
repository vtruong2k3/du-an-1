</div>
</div>
<footer></footer>
<script>
    const inputFile = document.getElementById("HinhAnh");
    const previewImage = document.getElementById("previewImage"); // Thay đổi ID này cho phù hợp với element hiển thị ảnh

    inputFile.addEventListener("change", function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.setAttribute("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // THêm xóa màu

    const colorInputsContainer = document.getElementById('color-inputs');
    const addColorBtn = document.getElementById('add-color-btn');

    let colorCount = 1; // Keeps track of the number of color inputs

    function createColorInput() {
        if (colorCount <= 3) { // Check if the maximum number of inputs (3) is reached
            const newInput = document.createElement('input');
            newInput.type = 'color';
            newInput.name = `MauSac[]`; // Array name for multiple colors
            newInput.id = `MauSac-${colorCount}`;
            newInput.required = true;

            const label = document.createElement('label');
            label.textContent = colorCount;
            label.setAttribute('for', newInput.id);

            const removeBtn = document.createElement('div');
            removeBtn.textContent = 'X';
            removeBtn.classList.add('remove-color-btn');
            removeBtn.setAttribute('data-index', colorCount);
            removeBtn.addEventListener('click', () => {
                removeColorInput(newInput, label);
            });

            const container = document.createElement('div');
            container.classList.add('color-input-group'); // Add a class for styling
            container.appendChild(label);
            container.appendChild(newInput);
            container.appendChild(removeBtn);

            colorInputsContainer.appendChild(container);
            colorCount++;

            // Disable add button if the maximum number of inputs (3) is reached
            if (colorCount > 3) {
                addColorBtn.disabled = true;
            }
        }
    }

    function removeColorInput(input, label) {
        const container = input.parentElement;
        colorInputsContainer.removeChild(container);
        colorCount--;

        // Update label numbers
        const labels = colorInputsContainer.querySelectorAll('label');
        labels.forEach((lbl, index) => {
            lbl.textContent = index + 1;
        });

        // Enable add button when an input is removed
        if (colorCount < 3) {
            addColorBtn.disabled = false;
        }
    }

    addColorBtn.addEventListener('click', createColorInput);

    // Initial rendering (if you want at least one color input by default)
    createColorInput();
</script>
</body>

</html>