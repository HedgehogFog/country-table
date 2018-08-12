<?php
$rows = $db->select("SELECT * FROM countries", array());

$countryList = array();

$i = 0;
foreach ($rows as $row) {
    $countryList[$i]['id'] = $row['id'];

    $countryList[$i]['name'] = $row['name'];
    $countryList[$i]['capital'] = $row['capital'];
    $countryList[$i]['description'] = $row['description'];
    $countryList[$i]['bin_data'] = $row['bin_data'];

    $i++;
}
?>
    <?php foreach ($countryList as $country): ?>
    <div class="single-country">
        <div class="country-info">


            <img src=../img/uploads/<?php echo $country['id'];?>.png alt=""/>
            <h2><?php echo $country['name'];?></h2>
            <h3>
                <?php echo $country['capital'];?>
            </h3>
            <p>
                <?php echo $country['description'];?>
            </p>

        </div>
    </div>
    <?php endforeach; ?>
