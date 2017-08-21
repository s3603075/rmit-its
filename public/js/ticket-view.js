$(document).ready(function() {
    $(function() {
        $(".change-status").change(function() {
            this.form.submit();
        });
    });
});