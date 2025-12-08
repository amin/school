<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Actors</h2>
    <ul></ul>

    <script>
        const addVampire = (name) => {
            const list = document.querySelector('ul');
            const item = document.createElement('li');
            item.textContent = name;
            list.append(item);

        }

        fetch('https://yrgo.github.io/api/movies/what-we-do-in-the-shadows.json')
            .then((response) => response.json())
            .then((data) => {

                Object.entries(data).forEach(([key, value]) => {
                    addVampire(value.name);
                })

                // for (actor of data) {
                //     addVampire(actor.name);
                // }
            });
    </script>
</body>

</html>