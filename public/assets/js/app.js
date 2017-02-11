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

  app.controller('WelcomeController', [
    '$scope', '$http',
    function($scope, $http) {
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

      $('#signup-form').submit(function(event) {
        event.preventDefault();
        alert("enviar");
        var serializedData = $(this).serializeObject();
        console.log(serializedData);

        $http.post(
          'register',
          serializedData
        )
        .then(function(res) {
          console.log("success: ", res);
        },
        function(resp) {
          console.log("error: ", resp.data);
          $.each(resp.data, function(key, val) {
            console.log(key, val);
            $('#signup-'+key).removeClass('valid').addClass('invalid validation-message');
            $('label[for="signup-'+key+'"]').attr('data-error', val[0]);
          });
        });
      });

      $('#login-form').submit(function(event){
        var $submitBtn = $(this).find('button[type="submit"]');

        if ($submitBtn.length > 0) {
          $submitBtn.addClass('disabled');
        }
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