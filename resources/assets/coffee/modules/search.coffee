$.StoreCamp.search =
  selectors: $.StoreCamp.options.search,
  searchData: new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('search'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
      url: APP_URL + '/searchQuery?search=%QUERY',
      wildcard: '%QUERY'
    }
  })
  activate: ->
    that = this
    $('#search-type .search-input').typeahead({
        highlight: true
      },
      {
        name: 'search',
        source: that.searchData,
        display: 'name',
        templates: {
          suggestion: (data) ->
            return '<li class="search-item"><a class="clearfix" href="' + data.url + '">' + data.name + '</a>' + data.body.substr(0, 120) + '...</li>';
            empty: [
              '<h3 class="empty-search text-center text-warning">',
              'Unable to find any Product that match the current query',
              '</h3>'].join('\n');
        }
      }
    );
    return
do $.StoreCamp.search.activate