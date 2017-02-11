(function(window) {
  'use strict';

  var app = angular.module('WTCEvents', []);

  app.controller('WelcomeController', [
    '$scope',
    function($scope) {
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

      $scope.showLogInModal = function() {
        $('#login-modal').modal('open');
      }

      $scope.showSignUpModal = function() {
        $('#signup-modal').modal('open');
      }
    }
  ]);
})(window);