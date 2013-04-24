<tr>
    <td>
        <a target="_blank" href="<?php echo $_row['link']; ?>">
            &gt;&gt;<?php echo $_row['post']; ?>
        </a>
    </td>

    <td class="class-<?php echo $_row['class']; ?>-sprite">
        <img src="images/sprites/<?php echo $_row['sprite']; ?>" />
    </td>
    <td style="font-size:13px;">
        <span class="ink-label class-<?php echo $_row['class']; ?>"><?php echo $_row['class']; ?></span>
        <span class="ink-label class-<?php echo $_row['class']; ?>">
            <?php echo $_row['id']; ?>
        </span>
    </td>

    <td class="<?php echo($_row['action']) ?>">
        <?php
            $_damage = $_row['damage'];
            $_bonus  = $_row['bonus'];
            $_roll   = $_row['roll'];
            $_class  = $_row['class'];

            switch ($_row['action']) {
                case 'damage':
                    if($_bonus>0){
                        if($_class=='W'){
                            echo "<i>rolls $_roll</i> and his minion hit for <span class='ink-label caution'>".($_damage+$_bonus)." <small>(+$_bonus)</small> HP</span>";
                        }else{
                            echo "<i>rolls $_roll</i> and damages the beast for <span class='ink-label caution'>".($_damage+$_bonus)." <small>(+$_bonus)</small> HP</span>";
                        }
                    }elseif($_bonus<0){
                        echo "<i>rolls $_roll</i> and damages the beast for <span class='ink-label caution'>".($_damage+$_bonus)." <small>($_bonus)</small> HP</span>";
                    }else{
                        echo "<i>rolls $_roll</i> and damages the beast for <span class='ink-label caution'>$_damage HP</span>";
                    }
                break;
                case 'death':
                    if($_damage==0){
                        echo "dies by rolling $_roll";
                    }else{
                        echo "dies by rolling $_roll. the beast heals for <span class='ink-label warning'>".(-$_damage)." HP</span>";
                    }
                break;
                case 'avenge':
                    if($_bonus>0){
                        echo "Avenges <b>".$_row['target']."</b> for extra damage <span class='ink-label caution'>".($_damage+$_bonus)." <small>(+$_bonus)</small> HP</span>";
                    }else{
                        echo "Avenges <b>".$_row['target']."</b> for extra damage <span class='ink-label caution'>$_damage HP</span>";
                    }

                break;
                case 'revive':
                    echo "Revives <b>".$_row['target']."</b> by rolling $_roll";
                break;
                case 'massrevive':
                    echo "<span class='ink-label success'>REVIVES EVERYONE!</span>";
                break;
                case 'winrar':
                    echo "<span class='ink-label success'>IS THE NEW HERO!</span>";
                break;
                case 'buff':
                    echo "Sings the bard song and boosts next 3 hits for <span class='ink-label caution' style='background-color:#F49D9D'>+".$_row['bonus']."</span>";
                break;
            }

        ?>
    </td>
</tr>
