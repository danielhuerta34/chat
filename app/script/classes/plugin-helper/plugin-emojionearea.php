<script type="text/javascript">
    $(document).ready(function () {
        $("<?php echo $elementName; ?>").emojioneArea({
            shortnames: true,
            saveEmojisAs : "shortname",
            placeholder: "Escribe algo aquí",
            autocomplete: true,
            searchPosition: "bottom",
            searchPlaceholder: "Buscar Emojis"
        });
    });
</script>    