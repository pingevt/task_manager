
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.taskManager = {
    attach: function (context, settings) {

      $('.task.draggable', context).draggable({ revert: true });

    },
    detach: function (context, settings, trigger) {},
  };
})(jQuery, Drupal, drupalSettings);
