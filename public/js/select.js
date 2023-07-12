$(function () {
    $('.selectcategory').select2({
        placeholder: 'Select Category',
          ajax: {
              url: '/selectcategory',
              multiple: true,
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                  return {
                      results: $.map(data, function (item) {
                          return {
                              text: item.nama,
                              id: item.id
                          }
                      })
                  };
              },
              cache: true
          }
      });
});
$(function () {
    $('.selectsuplier').select2({
        placeholder: 'Select Suplier',
          ajax: {
              url: '/selectsuplier',
              multiple: true,
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                  return {
                      results: $.map(data, function (item) {
                          return {
                              text: item.nama,
                              id: item.id
                          }
                      })
                  };
              },
              cache: true
          }
      });
});
