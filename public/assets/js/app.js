(function(window) {
  'use strict';

  var app = angular.module('WTCEvents', []);

  app.controller('WelcomeController', [
    '$scope',
    function($scope) {
      $scope.showModalByName = null;

      $('.modal').modal({
        dismissible: true,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        starting_top: '4%',
        ending_top: '10%',
        ready: function(modal, trigger) {
          console.log("Ready");
          console.log(modal, trigger);
        },
        complete: function() {}
      });

      $scope.showModal = function(modalName) {
        var $openModals = $('.modal.open');

        if ($openModals.length > 0) {
          $openModals.modal('close');
        }

        switch (modalName) {
          case 'login':
            $('#login-modal').modal('open');
            break;
          case 'signup':
            $('#signup-modal').modal('open');
            break;
          default:
            break;
        }
      };

      $scope.submitForm = function(formName) {
        switch (formName) {
          case 'signup':
            $('#signup-form').submit();
            break;
          default:
            break;
        }
      }
    }
  ]);
})(window);