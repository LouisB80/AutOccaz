var actualDate = Date();
var url = 'https://newsapi.org/v2/everything?' +
          'q=Automobiles&' +
          'language=fr&' +
          'from='+actualDate+'&' +
          'sortBy=popularity&' +
          'apiKey=7e319bab363c4238984b19c7d806a28d';
var req = new Request(url);
fetch(req)
.then(function(response) {
  response.json()
  .then(function(data){
    for (var i = 0; i < data.articles.length; i++) {
      $('#apiAuto').append(`<hr><article class="text-center mb-3"><a target="blank" href="${data.articles[i].url}"><div><img src="${data.articles[i].urlToImage}" alt="${data.articles[i].source.name}"></img><hr></div>${data.articles[i].title}</a></article>`);
    }
  })
})
