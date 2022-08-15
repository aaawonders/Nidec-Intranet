<style><?php include (__DIR__.'/./crudStyle.css')?></style>


<table class="Tabela">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>Data de Nascimento</td>
            <td>Gênero</td>
            <td>Foto</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>01</td>
            <td>André</td>
            <td>Silva</td>
            <td>15/08/2001</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>01</td>
            <td>André</td>
            <td>Silva</td>
            <td>15/08/2001</td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<div class="FormularioCRUD">
    <form action="" method="post">
        <!-- <label for="">Nome</label> -->
        <input type="text" name="Nome" id="CRUD-Nome">

        <!-- <label for="">Sobrenome</label> -->
        <input type="text" name="Sobrenome" id="CRUD-Sobrenome">

        <!-- <label for="">Data de Nascimento</label> -->
        <input type="date" name="Data_de_Nascimento" id="CRUD-Data">

        <!-- <label for="">Gênero</label> -->
        <input type="text" name="Genero" id="CRUD-Genero" maxlength="2">

        <!-- <label for="">Foto</label> -->
        <input type="file" name="Foto" id="CRUD-Foto"  accept="image/png, image/jpeg">

        <button type="submit" id="CRUD-Button-Submit">➡</button>

    </form>
</div>
