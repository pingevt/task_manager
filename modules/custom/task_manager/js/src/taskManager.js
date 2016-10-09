
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.taskManager = {
    attach: function (context, settings) {
/*
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
*/
      $('.pipeline .task-list').sortable({
        connectWith: ".pipeline .task-list"
      }).disableSelection()
      .on( "sortupdate", function( event, ui ) {
//console.log(event);
//console.log(ui);

//console.log($(event.target).parent());
console.log($(event.target).parent().data('project-id'));
        projectID = $(event.target).parent().data('project-id');

//console.log(event.target);
        var tasks = [];
        $(event.target.children).each(function (i, obj) {
//console.log(i);
//console.log(obj);
//console.log($(obj).data('task-id'));
          tasks.push($(obj).data('task-id'));
        });

console.log( tasks );
console.log( tasks.length );

        if (tasks.length > 0) {
          url = 'api/sort-project-tasks/' + projectID + '/' + tasks.join();
console.log( url );
          var request = $.ajax({
            url: url,
            method: "GET",
            dataType: "json"
          });

          request.done(function( msg ) {
console.log( msg );
          });
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
