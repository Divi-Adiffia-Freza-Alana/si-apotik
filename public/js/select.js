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
    $('#selectmastersatwa').select2({
        placeholder: 'Select Satwa',
          ajax: {
              url: '/selectmastersatwa',
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                  return {
                      results: $.map(data, function (item) {
                          return {
                              text: item.namasatwa,
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
    $('#selectexhibit').select2({
        placeholder: 'Select Exhibit',
          ajax: {
              url: '/selectexhibit',
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                  return {
                      results: $.map(data, function (item) {
                          return {
                              text: item.kode_kandang,
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
    $('#selectholding').select2({
        placeholder: 'Select Holding',
          ajax: {
              url: '/selectholding',
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                  return {
                      results: $.map(data, function (item) {
                          return {
                              text: item.kode_kandang,
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
    $('#selectzona').select2({
        placeholder: 'Select Zona',
          ajax: {
              url: '/selectzona',
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