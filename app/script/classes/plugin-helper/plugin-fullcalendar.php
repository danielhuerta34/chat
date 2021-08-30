<script type="text/javascript">
    $(document).on("pdocrud_on_load pdocrud_after_submission pdocrud_after_ajax_action", function (event, container) {
      $("<?php echo $elementName; ?>").fullCalendar(
        <?php echo json_encode($params, JSON_PRETTY_PRINT);?>
      );
    });
</script>