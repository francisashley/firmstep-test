<?php
    require_once 'app/db.php';
    require_once 'app/functions.php';
?>

<link rel="stylesheet" type="text/css" href="styles.css">

<h3>Add to queue</h3>
<form method="post" action="/queue">
    <div class="form-group">
        <label>First name:</label><br/>
        <input type="text" name="firstName"><br/><br/>
    </div>
    <div class="form-group">
        <label>Last name:</label><br/>
        <input type="text" name="lastName"><br/><br/>
    </div>
    <div class="form-group">
        <label>organization:</label><br/>
        <input type="text" name="organization"><br/><br/>
    </div>
    <div class="form-group">
        <label>Type (select):</label><br/>
        <select name="type">
            <option>Citizen</option>
            <option>Anonymous</option>
        </select>
    </div>
    <div class="form-group">
        <label>Service (select):</label><br/>
        <select name="service">
            <option value="Council Tax">Council tax</option>
            <option value="Benefits">Benefits</option>
            <option value="Rent">Rent</option>
        </select>
    </div>
    <input type="submit" name="submit">
</form>

<h3>Queued (today)</h3>
<table>
    <tr>
        <th>Id</th>
        <th>firstName</th>
        <th>lastName</th>
        <th>organization</th>
        <th>Type</th>
        <th>Service</th>
        <th>Date</th>
    </tr>
    <?php foreach (get($pdo) as $key => $queued) { ?>
        <tr>
            <?php foreach ($queued as $key => $item) { ?>
                <td><?= $item ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>