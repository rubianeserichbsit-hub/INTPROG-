<?php

$search = isset($_GET['search']) ? trim($_GET['search']) : "";

$members = [
    [
        "name" => "OYANDO, RHONEL R.",
        "role" => "MEMBER",
        "age" => 22,
        "address" => "SV3 Poblacion, Muntinlupa City",
        "phone" => "09170000001",
        "image" => "oyando.jpg"
    ],
    [
        "name" => "CABALHIN, JHON EARL L.",
        "role" => "MEMBER",
        "age" => 19,
        "address" => "Tunasan, Muntinlupa City",
        "phone" => "09170000002",
        "image" => "cabalhin.jpg"
    ],
    [
        "name" => "ROTAO, ALLYSA JOI",
        "role" => "LEADER",
        "age" => 22,
        "address" => "Green Revolution, Las Piñas City",
        "phone" => "09170000003",
        "image" => "rotao.jpg"
    ],
    [
        "name" => "RODELAS, JOYCE B.",
        "role" => "MEMBER",
        "age" => 20,
        "address" => "Sucat, Muntinlupa City",
        "phone" => "09170000004",
        "image" => "rodelas.jpg"
    ],
    [
        "name" => "RUBIANES, ERICH V.",
        "role" => "MEMBER",
        "age" => 20,
        "address" => "Sucat, Muntinlupa City",
        "phone" => "09170000005",
        "image" => "rubianes.jpg"
    ],
    [
        "name" => "QUIANE, AJ M.",
        "role" => "MEMBER",
        "age" => 20,
        "address" => "Alabang, Muntinlupa City",
        "phone" => "09170000006",
        "image" => "quiane.jpg"
    ],
    [
        "name" => "FERRER, KARL JUSTIN R.",
        "role" => "MEMBER",
        "age" => 21,
        "address" => "San Pedro, Laguna",
        "phone" => "09170000007",
        "image" => "ferrer.jpg"
    ]
];

$filteredMembers = [];

foreach ($members as $member) {
    if (
        $search === "" ||
        stripos($member["name"], $search) !== false ||
        stripos($member["role"], $search) !== false
    ) {
        $filteredMembers[] = $member;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Portfolio</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #eef5ff;
            color: #333;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            padding: 32px 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        .container {
            width: 100%;
            max-width: 930px;
            margin: auto;
        }

        .title {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }

        .subtitle {
            margin-top: 7px;
            color: #888;
            font-size: 13px;
            letter-spacing: 0.2px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-top: 18px;
        }

        .search-input {
            flex: 1;
            height: 38px;
            padding: 0 13px;
            border: 1px solid #dedede;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
            background: white;
        }

        .search-input:focus {
            border-color: #aaa;
        }

        .search-btn,
        .clear-btn {
            height: 38px;
            padding: 0 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .search-btn {
            background: #333;
            color: white;
        }

        .clear-btn {
            background: #f1f1f1;
            color: #444;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .search-btn:hover {
            background: #222;
        }

        .clear-btn:hover {
            background: #ddd;
        }

        .team-container {
            padding: 22px 0 40px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .member-card {
            background: white;
            min-height: 195px;
            padding: 18px;
            border-radius: 9px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
            display: flex;
            align-items: flex-start;
            gap: 13px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .member-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.10);
        }

        .profile-image {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 7px;
            object-fit: cover;
            background: #eee;
        }

        .member-info {
            flex: 1;
            min-width: 0;
        }

        .member-name {
            margin: 0;
            font-size: 15px;
            line-height: 1.3;
            font-weight: 700;
            color: #222;
        }

        .member-role {
            margin-top: 4px;
            margin-bottom: 8px;
            color: #777;
            font-size: 12px;
            text-transform: uppercase;
        }

        .member-detail {
            margin: 5px 0;
            color: #666;
            font-size: 12px;
            line-height: 1.4;
        }

        .view-btn {
            display: inline-block;
            margin-top: 8px;
            padding: 7px 12px;
            background: #f3f3f3;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-size: 12px;
        }

        .view-btn:hover {
            background: #ddd;
        }

        .no-results {
            grid-column: 1 / -1;
            background: white;
            padding: 35px;
            text-align: center;
            border-radius: 9px;
            color: #777;
        }

        @media (max-width: 800px) {
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 550px) {
            .team-grid {
                grid-template-columns: 1fr;
            }

            .search-form {
                flex-wrap: wrap;
            }

            .search-input {
                width: 100%;
                flex: none;
            }
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <h1 class="title">Team Portfolio</h1>

            <div class="subtitle">
                GROUP 3 INTEGRATIVE PROGRAMMING 3J.
            </div>

            <form action="index.php" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search by name or role"
                    value="<?php echo htmlspecialchars($search); ?>"
                >

                <button type="submit" class="search-btn">
                    Search
                </button>

                <a href="index.php" class="clear-btn">
                    Clear
                </a>
            </form>
        </div>
    </header>

    <main class="container team-container">

        <div class="team-grid">

            <?php if (count($filteredMembers) > 0): ?>

                <?php foreach ($filteredMembers as $member): ?>

                    <div class="member-card">

                        <img
                            src="<?php echo htmlspecialchars($member["image"]); ?>"
                            alt="Profile Picture"
                            class="profile-image"
                        >

                        <div class="member-info">

                            <h2 class="member-name">
                                <?php echo htmlspecialchars($member["name"]); ?>
                            </h2>

                            <div class="member-role">
                                <?php echo htmlspecialchars($member["role"]); ?>
                            </div>

                            <div class="member-detail">
                                🎂 Age:
                                <?php echo htmlspecialchars($member["age"]); ?>
                            </div>

                            <div class="member-detail">
                                📍
                                <?php echo htmlspecialchars($member["address"]); ?>
                            </div>

                            <div class="member-detail">
                                ☎
                                <?php echo htmlspecialchars($member["phone"]); ?>
                            </div>

                            <a href="#" class="view-btn">
                                View
                            </a>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="no-results">
                    No team member found.
                </div>

            <?php endif; ?>

        </div>

    </main>

</body>
</html>
