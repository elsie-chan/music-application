import ajaxRequest from "./ajaxRequest.js";

function getArtistById(url, id) {
  // console.log(url, id, "at call ajax");
  let artist = {};
  ajaxRequest(
    url,
    "POST",
    { name: id },
    function (data) {
      artist = data;
    },
    function (err) {
      console.log("get artist error");
    },
    {
      async: false,
    }
  );
  return artist;
}

export default getArtistById;
