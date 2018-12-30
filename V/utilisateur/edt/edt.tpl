<h2 style="margin:20px"> Votre emploi du temps hebdomadaire</h2>


<table class = "edt" >
    <tr  class="table-dark bold">
        <td>
            <?php echo $_SESSION['promo']; ?>
        </td>
        <td>
            LUNDI
        </td>
        <td>
            MARDI
        </td>
        <td>
            MERCREDI
        </td>
        <td>
            JEUDI
        </td>
        <td>
            VENDREDI
        </td>
    </tr>  
    <tr class="edt-cell">
        <td class="heure">
            8h00
        </td>
        <td style="background: <?php echo isset($_SESSION['monday8_cou'])?($_SESSION['monday8_cou']):'';?> " <?php if ( isset($_SESSION['monday8_dur']) && $_SESSION['monday8_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday8_mat'])?($_SESSION['monday8_mat']):'' . "<br>"; echo isset($_SESSION['monday8_sal'])?($_SESSION['monday8_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday8_cou'])?($_SESSION['tuesday8_cou']):'';?> " <?php if ( isset($_SESSION['tuesday8_dur']) && $_SESSION['tuesday8_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday8_mat'])?($_SESSION['tuesday8_mat']):'' . "<br>"; echo isset($_SESSION['tuesday8_sal'])?($_SESSION['tuesday8_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday8_cou'])?($_SESSION['wednesday8_cou']):'';?> " <?php if ( isset($_SESSION['wednesday8_dur']) && $_SESSION['wednesday8_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday8_mat'])?($_SESSION['wednesday8_mat']):'' . "<br>"; echo isset($_SESSION['wednesday8_sal'])?($_SESSION['wednesday8_sal']):'' ; ?>
        </td>
         <td style="background: <?php echo isset($_SESSION['thursday8_cou'])?($_SESSION['thursday8_cou']):'';?> " <?php if ( isset($_SESSION['thursday8_dur']) && $_SESSION['thursday8_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday8_mat'])?($_SESSION['thursday8_mat']):'' . "<br>"; echo isset($_SESSION['thursday8_sal'])?($_SESSION['thursday8_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday8_cou'])?($_SESSION['friday8_cou']):'';?> " <?php if ( isset($_SESSION['friday8_dur']) && $_SESSION['friday8_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday8_mat'])?($_SESSION['friday8_mat']):'' . "<br>"; echo isset($_SESSION['friday8_sal'])?($_SESSION['friday8_sal']):'' ; ?>
        </td>
    </tr>
    <tr class="edt-cell">
         <td class="heure">
            9h30
        </td>
        <td style="background: <?php echo isset($_SESSION['monday930_cou'])?($_SESSION['monday930_cou']):'';?> " <?php if ( isset($_SESSION['monday930_dur']) && $_SESSION['monday930_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday930_mat'])?($_SESSION['monday930_mat']):'' . "<br>"; echo isset($_SESSION['monday930_sal'])?($_SESSION['monday930_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday930_cou'])?($_SESSION['tuesday930_cou']):'';?> " <?php if ( isset($_SESSION['tuesday930_dur']) && $_SESSION['tuesday930_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday930_mat'])?($_SESSION['tuesday930_mat']):'' . "<br>"; echo isset($_SESSION['tuesday930_sal'])?($_SESSION['tuesday930_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday930_cou'])?($_SESSION['wednesday930_cou']):'';?> " <?php if ( isset($_SESSION['wednesday930_dur']) && $_SESSION['wednesday930_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday930_mat'])?($_SESSION['wednesday930_mat']):'' . "<br>"; echo isset($_SESSION['wednesday930_sal'])?($_SESSION['wednesday930_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['thursday930_cou'])?($_SESSION['thursday930_cou']):'';?> " <?php if ( isset($_SESSION['thursday930_dur']) && $_SESSION['thursday930_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday930_mat'])?($_SESSION['thursday930_mat']):'' . "<br>"; echo isset($_SESSION['thursday930_sal'])?($_SESSION['thursday930_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday930_cou'])?($_SESSION['friday930_cou']):'';?> " <?php if ( isset($_SESSION['friday930_dur']) && $_SESSION['friday930_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday930_mat'])?($_SESSION['friday930_mat']):'' . "<br>"; echo isset($_SESSION['friday930_sal'])?($_SESSION['friday930_sal']):'' ; ?>
        </td>
    </tr>

<tr class="edt-cell">
         <td class="heure">
            11h00
        </td>
        <td style="background: <?php echo isset($_SESSION['monday11_cou'])?($_SESSION['monday11_cou']):'';?> " <?php if ( isset($_SESSION['monday11_dur']) && $_SESSION['monday11_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday11_mat'])?($_SESSION['monday11_mat']):'' . "<br>"; echo isset($_SESSION['monday11_sal'])?($_SESSION['monday11_sal']):''; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday11_cou'])?($_SESSION['tuesday11_cou']):'';?> " <?php if ( isset($_SESSION['tuesday11_dur']) && $_SESSION['tuesday11_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday11_mat'])?($_SESSION['tuesday11_mat']):'' . "<br>"; echo isset($_SESSION['tuesday11_sal'])?($_SESSION['tuesday11_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday11_cou'])?($_SESSION['wednesday11_cou']):'';?> " <?php if ( isset($_SESSION['wednesday11_dur']) && $_SESSION['wednesday11_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday11_mat'])?($_SESSION['wednesday11_mat']):'' . "<br>"; echo isset($_SESSION['wednesday11_sal'])?($_SESSION['wednesday11_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['thursday11_cou'])?($_SESSION['thursday11_cou']):'';?> " <?php if ( isset($_SESSION['thursday11_dur']) && $_SESSION['thursday11_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday11_mat'])?($_SESSION['thursday11_mat']):'' . "<br>"; echo isset($_SESSION['thursday11_sal'])?($_SESSION['thursday11_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday11_cou'])?($_SESSION['friday11_cou']):'';?> " <?php if ( isset($_SESSION['friday11_dur']) && $_SESSION['friday11_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday11_mat'])?($_SESSION['friday11_mat']):'' . "<br>"; echo isset($_SESSION['friday11_sal'])?($_SESSION['friday11_sal']):''; ?>
        </td>
    
    </tr>

<tr class="edt-cell">
        <td class="heure">
            12h30
        </td>
        <td style="background: <?php echo isset($_SESSION['monday1230_cou'])?($_SESSION['monday1230_cou']):'';?> " <?php if ( isset($_SESSION['monday1230_dur']) && $_SESSION['monday1230_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday1230_mat'])?($_SESSION['monday1230_mat']):'' . "<br>"; echo isset($_SESSION['monday1230_sal'])?($_SESSION['monday1230_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday1230_cou'])?($_SESSION['tuesday1230_cou']):'';?> " <?php if ( isset($_SESSION['tuesday1230_dur']) && $_SESSION['tuesday1230_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday1230_mat'])?($_SESSION['tuesday1230_mat']):'' . "<br>"; echo isset($_SESSION['tuesday1230_sal'])?($_SESSION['tuesday1230_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday1230_cou'])?($_SESSION['wednesday1230_cou']):'';?> " <?php if ( isset($_SESSION['wednesday1230_dur']) && $_SESSION['wednesday1230_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday1230_mat'])?($_SESSION['wednesday1230_mat']):'' . "<br>"; echo isset($_SESSION['wednesday1230_sal'])?($_SESSION['wednesday1230_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['thursday1230_cou'])?($_SESSION['thursday1230_cou']):'';?> " <?php if ( isset($_SESSION['thursday1230_dur']) && $_SESSION['thursday1230_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday1230_mat'])?($_SESSION['thursday1230_mat']):'' . "<br>"; echo isset($_SESSION['thursday1230_sal'])?($_SESSION['thursday1230_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday1230_cou'])?($_SESSION['friday1230_cou']):'';?> " <?php if ( isset($_SESSION['friday1230_dur']) && $_SESSION['friday1230_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday1230_mat'])?($_SESSION['friday1230_mat']):'' . "<br>"; echo isset($_SESSION['friday1230_sal'])?($_SESSION['friday1230_sal']):'' ; ?>
        </td>
    </tr>
    <tr class="edt-cell">
        <td class="heure">
            14h00
        </td>
        <td style="background: <?php echo isset($_SESSION['monday14_cou'])?($_SESSION['monday14_cou']):'';?> " <?php if ( isset($_SESSION['monday14_dur']) && $_SESSION['monday14_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday14_mat'])?($_SESSION['monday14_mat']):'' . "<br>"; echo isset($_SESSION['monday14_sal'])?($_SESSION['monday14_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday14_cou'])?($_SESSION['tuesday14_cou']):'';?> " <?php if ( isset($_SESSION['tuesday14_dur']) && $_SESSION['tuesday14_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday14_mat'])?($_SESSION['tuesday14_mat']):'' . "<br>"; echo isset($_SESSION['tuesday14_sal'])?($_SESSION['tuesday14_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday14_cou'])?($_SESSION['wednesday14_cou']):'';?> " <?php if ( isset($_SESSION['wednesday14_dur']) && $_SESSION['wednesday14_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday14_mat'])?($_SESSION['wednesday14_mat']):'' . "<br>"; echo isset($_SESSION['wednesday14_sal'])?($_SESSION['wednesday14_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['thursday14_cou'])?($_SESSION['thursday14_cou']):'';?> " <?php if ( isset($_SESSION['thursday14_dur']) && $_SESSION['thursday14_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday14_mat'])?($_SESSION['thursday14_mat']):'' . "<br>"; echo isset($_SESSION['thursday14_sal'])?($_SESSION['thursday14_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday14_cou'])?($_SESSION['friday14_cou']):'';?> " <?php if ( isset($_SESSION['friday14_dur']) && $_SESSION['friday14_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday14_mat'])?($_SESSION['friday14_mat']):'' . "<br>"; echo isset($_SESSION['friday14_sal'])?($_SESSION['friday14_sal']):'' ; ?>
        </td>
    </tr>
    <tr class="edt-cell">
        <td class="heure">
            15h30
        </td>
        <td style="background: <?php echo isset($_SESSION['monday1530_cou'])?($_SESSION['monday1530_cou']):'';?> " <?php if ( isset($_SESSION['monday1530_dur']) && $_SESSION['monday1530_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday1530_mat'])?($_SESSION['monday1530_mat']):'' . "<br>"; echo isset($_SESSION['monday1530_sal'])?($_SESSION['monday1530_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday1530_cou'])?($_SESSION['tuesday1530_cou']):'';?> " <?php if ( isset($_SESSION['tuesday1530_dur']) && $_SESSION['tuesday1530_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday1530_mat'])?($_SESSION['tuesday1530_mat']):'' . "<br>"; echo isset($_SESSION['tuesday1530_sal'])?($_SESSION['tuesday1530_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday1530_cou'])?($_SESSION['wednesday1530_cou']):'';?> " <?php if ( isset($_SESSION['wednesday1530_dur']) && $_SESSION['wednesday1530_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday1530_mat'])?($_SESSION['wednesday1530_mat']):'' . "<br>"; echo isset($_SESSION['wednesday1530_sal'])?($_SESSION['wednesday1530_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['thursday1530_cou'])?($_SESSION['thursday1530_cou']):'';?> " <?php if ( isset($_SESSION['thursday1530_dur']) && $_SESSION['thursday1530_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday1530_mat'])?($_SESSION['thursday1530_mat']):'' . "<br>"; echo isset($_SESSION['thursday1530_sal'])?($_SESSION['thursday1530_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday1530_cou'])?($_SESSION['friday1530_cou']):'';?> " <?php if ( isset($_SESSION['friday1530_dur']) && $_SESSION['friday1530_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday1530_mat'])?($_SESSION['friday1530_mat']):'' . "<br>"; echo isset($_SESSION['friday1530_sal'])?($_SESSION['friday1530_sal']):'' ; ?>
        </td>
    </tr>
    <tr class="edt-cell">
        <td class="heure">
            17h00
        </td>
        <td style="background: <?php echo isset($_SESSION['monday17_cou'])?($_SESSION['monday17_cou']):'';?> " <?php if ( isset($_SESSION['monday17_dur']) && $_SESSION['monday17_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['monday17_mat'])?($_SESSION['monday17_mat']):'' . "<br>"; echo isset($_SESSION['monday17_sal'])?($_SESSION['monday17_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['tuesday17_cou'])?($_SESSION['tuesday17_cou']):'';?> " <?php if ( isset($_SESSION['tuesday17_dur']) && $_SESSION['tuesday17_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['tuesday17_mat'])?($_SESSION['tuesday17_mat']):'' . "<br>"; echo isset($_SESSION['tuesday17_sal'])?($_SESSION['tuesday17_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['wednesday17_cou'])?($_SESSION['wednesday17_cou']):'';?> " <?php if ( isset($_SESSION['wednesday17_dur']) && $_SESSION['wednesday17_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['wednesday_mat'])?($_SESSION['wednesday_mat']):'' . "<br>"; echo isset($_SESSION['wednesday17_sal'])?($_SESSION['wednesday17_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['thursday17_cou'])?($_SESSION['thursday17_cou']):'';?> " <?php if ( isset($_SESSION['thursday17_dur']) && $_SESSION['thursday17_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['thursday17_mat'])?($_SESSION['thursday17_mat']):'' . "<br>"; echo isset($_SESSION['thursday17_sal'])?($_SESSION['thursday17_sal']):'' ; ?>
        </td>
        <td style="background: <?php echo isset($_SESSION['friday17_cou'])?($_SESSION['friday17_cou']):'';?> " <?php if ( isset($_SESSION['friday17_dur']) && $_SESSION['friday17_dur']==3){echo 'rowspan="2"';} ?> >
            <?php echo isset($_SESSION['friday17_mat'])?($_SESSION['friday17_mat']):'' . "<br>"; echo isset($_SESSION['friday17_sal'])?($_SESSION['friday17_sal']):''; ?>
    </tr>

    </tr>


</table>



<style>
.edt td {
    padding-left:50px;
    padding-right:50px;
    padding-top:25px;
    padding-bottom:25px;
    border: 3px solid grey;
    
}
.edt {
    margin-left: 200px;
    border: 1px solid white;
    
}
.bold {
    font-weight: bold;
}
.edt-cell {
    color: black;
    background-color: rgba(220,220,220,0.8);
}
.edt-cell td:hover {
    background:<?php echo $_SESSION['couleur'];?> ;
}

</style>
<script>
    var x = document.querySelector(".selPro");
    var y = document.querySelector(".selGrp");
    x.addEventListener("click", function(){
        if(y.firstChild.selected == false){
            y.firstChild.selected = true;
        }
    })
    y.addEventListener("click", function(){
        if(x.firstChild.selected == false){
            x.firstChild.selected = true;
        }
    })
</script>