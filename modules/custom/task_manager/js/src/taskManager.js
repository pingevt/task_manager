
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.taskManager = {
    attach: function (context, settings) {

      $('.task.draggable', context).draggable({
        containment: ".pane",
        revert: "invalid",
        //helper: "clone",
        cursor: "move"
      });



      $('.pipeline.droppable', context).droppable({
        accept: ".task.draggable",
        drop: function( event, ui ) {
//console.log(event);
//console.log(ui);
          moveTask( ui.draggable, event.target );
        }
      });

    },
    detach: function (context, settings, trigger) {},
  };

  function moveTask(task, target) {
//console.log(target);
    $(task).appendTo($(target)).css({
      top: 'auto',
      bottom: 'auto',
      right: 'auto',
      left: 'auto'
    });
  }

})(jQuery, Drupal, drupalSettings);
