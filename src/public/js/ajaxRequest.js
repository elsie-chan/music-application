function ajaxRequest(url = '', type = '', data = {}, success, error = () => {}, options) {
  $.ajax({
    ...options,
    url,
    type,
    data: data,
    success: (data) => success(data),
    error: (err) => error(err),
  });
}
export default ajaxRequest;
