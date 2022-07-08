<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link rel="stylesheet" href="../resources/css/categories.css">
    <style>
        .d-flex {
            /* display: flex;
            justify-content: center;
            align-items: center; */
            text-align: center;
        }

        footer {
            height: 80px;
            width: 100%;
            background-color: black;
        }

        .btn {
            border: 2px solid orange;
            border-radius: 20px;
            cursor: pointer;
            background-color: orange;
            color: white;
            margin-top: 5px;
            padding: 5px 5px 5px 5px;
            width: 100%;
            height: 50px;
        }

        h2 {
            margin: 0;
            margin-bottom: 15px;
        }

        .filter {
            text-decoration: underline;
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <h2>Categories</h2>
        <div>
            <label for="companies" class="filter">Filter</label>
            <select name="companies" id="companies">
                <option value="plumbery" class="dropdown">Plumbery</option>
                <option value="maintenance" class="dropdown">Maintenance</option>
                <option value="electricity" class="dropdown">Electricity</option>
            </select>
        </div>
        <br><br>
        <div>
            <form action="" method="POST">
                @csrf
                <input type="submit" class="btn" name="plumbery" value="PLUMBERY"><br>
                <input type="submit" class="btn" name="maintenance" value="MAINTENANCE"><br>
                <input type="submit" class="btn" name="electricity" value="ELECTRICITY"><br>
            </form>
        </div>
    </div><br><br>
    <footer></footer>
</body>

</html>
