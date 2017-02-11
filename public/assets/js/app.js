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
        complete: function() {
          console.log('Closed');
        }
      });

      $scope.$watch('showModalByName', function(newVal, oldVal) {

        if ($('.modal.open').length > 0) {
          $('.modal.open').modal('close');
        }

        if (newVal == 'login') {
          $('#login-modal').modal('open');
        }
        else if (newVal == 'signup') {
          $('#signup-modal').modal('open'); 
        }
      });

      $scope.showModal = function(modalName) {
        $scope.showModalByName = modalName;
      };

      $scope.changeToSignUpModalEvent = function() {
        $scope.showModalByName = 'signup';
      }
    }
  ]);
})(window);