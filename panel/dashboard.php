<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/dashboard.css">
</head>

<body>

    <div class="container_wrap">
        <div class="sidebar">
            <div class="top-text">
                <h2>Sidebar menu</h2>
            </div>
            <div class="down-text">
                <a href="#">Edit</a>
                <a href="#">Tambah</a>
                <a href="#">history</a>
            </div>
        </div>
        <main>
            <div class="navbar">
                <button class="button-sidebar" onclick="buttonSidebar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <h1>Dashboard</h1>
                <a href="#">Keluar</a>
            </div>
        </main>
    </div>

</body>
<script>
    let count = 0

    function buttonSidebar() {
        count++
        const sidebar = document.querySelector(".sidebar")
        const main = document.querySelector("main")
        const buttonSidebar = document.querySelector(".button-sidebar")
        if (count % 2 === 1) {
            sidebar.style = "left: 0; position: relative;"
            main.classList.add("transisi")
            main.classList.remove("close")

        } else {
            sidebar.style = "position: absolute; left: -100%"
            main.classList.remove("transisi")
            main.classList.add("close")
        }

    }
</script>

</html>