<?php
 /*
page : index.php?p=list
le code php est permis et la connexion mysql est automatique.*/

	$query = "CALL latest_medias(" .$DisplayLatestMedias . ")";

if ($result = mysqli_query($mysql, $query)) {
?>
  <table>
                <tr>
                    <td width="80">-:Category</td>
                    <td width="500">-:Media</td>
                    <td width="196">-:Comment</td>
                </tr>
<?php

    /* Récupère un tableau associatif */
    while ($row = mysqli_fetch_assoc($result)) {
?>
                <tr>
                    <td><div class="icon <?php echo(htmlentities($row["media_type_short_name"])); ?>"></div></td>
                    <td><a href="<?php echo(htmlentities($row["media_url"])); ?>" <?php if (isset($row["insane"]) && $row["insane"]=="1") echo ("class=\"insane\"");?> rel="follow" target="_blank" title="Type: <?php echo(htmlentities($row["media_type_name"])); ?> <?php if (isset($row["insane"]) && $row["insane"]=="1") echo ("*INSANE*");?>"><?php echo(htmlentities($row["media_title"])); ?></a> <?php if (isset($row["insane"]) && $row["insane"]=="1") echo (" <b><font color='red'>/!\\</font></b>");?></td>
                    <td><?php echo(htmlentities($row["media_comment"])); ?></td>
                </tr>
<?php
    }
echo ('</table>');
    /* Libération des résultats */
    mysqli_free_result($result);
}

/* Fermeture de la connexion */
mysqli_close($mysql);
?>
			