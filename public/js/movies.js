$(document).ready(function() { 
    const template = $('#movie-template');

    const list = $('#movies-list');
    let data = $('#movies-list').data('movies');

    let next = data.links.next;
    const api = data.meta.path;

    const loadMore = (items) => {
        items.forEach(movie => {
            let item = $(template.html());
            item.removeAttr('id');
            item.find('a').attr('href', item.find('a').attr('href').replace('movie_id', movie.id)); 
            item.find('img').attr('src', movie.thumbnail).attr('alt', movie.title);
            item.find('[date]').text(movie.date);
            item.find('[title]').text(movie.title);
            item.find('[location]').text(movie.location);
            list.append(item);
        });
    };

    loadMore(data.data);

    const section = $('section');
    const offset = $('#movies-list li').height() * 3 * 1.3;
    console.log(offset);

    section.on('scroll', function () {
        if(next && section.scrollTop() + section.innerHeight() >= section[0].scrollHeight - offset) {
            $.get(
                next, 
                function(response) {
                    loadMore(response.data);
                    next = response.links.next;
                }, 
            );

            next = null;
        }
    });

    const search = debounce(() => {
            const value = $('#search').val().toLowerCase();
 
            $.get(api + '?search=' + value, function(response) {
                list.empty();
                section.scrollTop(0);
                loadMore(response.data);
                next = response.links.next;
            });
        }, 500);

    $('#search').on('input', function() {
        search();
    });
});

function debounce(callback, delay) {
  let timer
  return function() {
    clearTimeout(timer)
    timer = setTimeout(() => {
      callback();
    }, delay)
  }
}