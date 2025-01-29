$(ExerciseData.php).ready(function() {
    $('.dropdown-item').click(function() {
        var difficulty = $(this).data('difficulty');
        $('.data').hide();
        $('[data-difficulty="' + difficulty + '"]').show();
    });
});