
</div>
</main>
</div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function loadContent(page) {
// Use AJAX to load content dynamically
$.ajax({
    url: page,
    cache: false,
    success: function (html) {
        $('#main-content').html(html);
    }
});
}
</script>
</body>
</html>
