$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};

(function(window) {
  'use strict';

  var app = angular.module('WTCEvents', []);

  app.run(function($rootScope) {
    $rootScope.APP_URL = 'http://localhost:7008/php/WTCEvents';
  })

  app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
  }]);

  app.controller('WelcomeController', [
    '$scope', '$http',
    function($scope, $http) {
      $scope.sendingData = false;

      $('.modal').modal({
        dismissible: true,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        starting_top: '4%',
        ending_top: '10%',
        ready: function(modal, trigger) {
        },
        complete: function() {}
      });

      $('#signup-form').submit(function(event) {
        event.preventDefault();
        var $submitBtn = $(this).find('button[type="submit"]'),
            serializedData = $(this).serializeObject();

        if ($submitBtn.length > 0) {
          $submitBtn.addClass('disabled');
        }
        $scope.sendingData = true;

        $http.post(
          'register',
          serializedData
        )
        .then(function(res) {
          setTimeout(function() {
            $scope.sendingData = false;
            location.replace($scope.APP_URL + '/event/create');
          }, 2000);
        },
        function(res) {
          $scope.sendingData = false;
          $.each(res.data, function(key, val) {
            $('#signup-'+key).removeClass('valid').addClass('invalid validation-message');
            $('label[for="signup-'+key+'"]').attr('data-error', Array.isArray(val) ? val[0] : val);
            $submitBtn.removeClass('disabled');
          });
        });
      });

      $('#login-form').submit(function(event){
        event.preventDefault();
        var $submitBtn = $(this).find('button[type="submit"]'),
            serializedData = $(this).serializeObject();

        if ($submitBtn.length > 0) {
          $submitBtn.addClass('disabled');
        }
        $scope.sendingData = true;

        $http.post(
          'login',
          serializedData
        )
        .then(function(res) {
          setTimeout(function() {
            $scope.sendingData = false;
            location.replace($scope.APP_URL + '/event/create');
          }, 2000);
        }, function(res) {
          $scope.sendingData = false;
          $.each(res.data, function(key, val) {
            $('#login-'+key).removeClass('valid').addClass('invalid validation-message');
            $('label[for="login-'+key+'"]').attr('data-error', Array.isArray(val) ? val[0] : val);
            $submitBtn.removeClass('disabled');
          });
        })
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
    }
  ]);
})(window);