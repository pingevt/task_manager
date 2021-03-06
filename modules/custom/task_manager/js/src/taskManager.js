
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.taskManager = {
    attach: function (context, settings) {
      // Set board size
      numOfBoards = $('.board .pane .pipeline', context).length;
console.log(numOfBoards);
      size = (numOfBoards * 300) + 50;
console.log(size);

      $('.board .pane').css('width', size+'px');

      // Setup sortable
      $('.pipeline .task-list').sortable({
        containment: ".pane",
        connectWith: ".pipeline .task-list"
      }).disableSelection()
      .on( "sortupdate", function( event, ui ) {

        projectID = $(event.target).parent().data('project-id');

        var tasks = [];
        $(event.target.children).each(function (i, obj) {
//console.log(i);
//console.log(obj);
//console.log($(obj).data('task-id'));
          tasks.push($(obj).data('task-id'));
        });

        if (tasks.length > 0) {
          url = 'api/sort-project-tasks/' + projectID + '/' + tasks.join();
          var request = $.ajax({
            url: url,
            method: "GET",
            dataType: "json"
          });

          request.done(function( msg ) {
//console.log( msg );
          });
        }

      });
    },
    detach: function (context, settings, trigger) {},
  };
})(jQuery, Drupal, drupalSettings);
