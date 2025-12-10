<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giphy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectre.css/0.5.5/spectre.min.css">
</head>

<body>
    <div class="container grid-md">
        <form class="columns my-2" method="post" action="/api/giphy.php">
            <div class="column col-6">
                <input type="search" name="search" placeholder="Search gifs..." class="form-input">
            </div>
            <div class="column col-2">
                <select class="form-select" name="limit">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="column col-4">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </div>
        </form>
        <div class="columns my-2">
            <!-- TODO: Implement search result list here -->
            <div class="column col-12 gifs my-1">
                <img src="https://media1.giphy.com/media/gw3IWyGkC0rsazTi/giphy.gif" width="100%">
            </div>
        </div>
    </div>

    <script>
        const gifs = document.querySelector('.gifs');
        const form = document.querySelector('form');
        const submit = document.querySelector('button[type="submit"]');

        submit.addEventListener('click', (e) => {
            e.preventDefault();
            searchForGifs(new FormData(form));
        });

        const getErrorElement = (message) => {
            const errorElement = document.createElement('p');
            errorElement.classList.add('text-error');
            errorElement.textContent = (message);
            return errorElement;
        };


        const searchForGifs = async (data) => {
            gifs.innerHTML = '<p>Loading...</p>';
            try {
                const response = await fetch('/api/giphy.php', {
                    method: 'POST',
                    body: data
                });

                if (!response.ok) {
                    const error = await response.json();
                    gifs.replaceChildren(getErrorElement(error.error || 'Something went wrong'));
                    return;
                }

                const results = await response.json();

                if (results.data?.length) {
                    const gifContainer = [];

                    for (const gif of results.data) {
                        const gifImg = document.createElement('img');
                        gifImg.src = gif.images.downsized.url;
                        gifImg.style.width = "50%";
                        gifImg.style.height = "275px";
                        gifImg.style.objectFit = "cover";
                        gifImg.style.display = "inline-block";
                        gifImg.style.verticalAlign = "top";
                        gifContainer.push(gifImg);
                    }
                    gifs.replaceChildren(...gifContainer);
                }

            } catch (e) {
                gifs.replaceChildren(getErrorElement('Network error. Please try again.'));
            }
        }
    </script>
</body>

</html>