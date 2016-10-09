
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
          moveTask( ui.draggable, event.target );
        }
      });

    },
    detach: function (context, settings, trigger) {},
  };

  function moveTask(task, target) {
console.log(target);
console.log($(target).data('project-id'));
console.log(task);
console.log($(task).data('task-id'));

    url = 'api/change-task-project/' + $(task).data('task-id');
    url += '/' + $(target).data('project-id');
    var request = $.ajax({
      url: url,
      method: "GET",
      dataType: "json"
    });

    $(task).appendTo($(target)).css({
      top: 'auto',
      bottom: 'auto',
      right: 'auto',
      left: 'auto'
    });

    request.done(function( msg ) {
console.log( msg );
    });

  }

})(jQuery, Drupal, drupalSettings);
