<script src="{{ asset('Js/Js.js') }}"></script>

<script>
    // JavaScript to handle the "Xem thêm" functionality
    document.querySelectorAll('.load-more').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var moreContent = this.previousElementSibling;
            if (moreContent.style.display === 'block') {
                moreContent.style.display = 'none';
                this.textContent = 'Xem thêm';
            } else {
                moreContent.style.display = 'block';
                this.textContent = 'Thu gọn';
            }
        });
    });
</script>
