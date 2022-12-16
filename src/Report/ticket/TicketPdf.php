<?php

$data = "<!DOCTYPE html>

<div style='font-family: Helvetica, sans-serif; font-size: 20px;' class='page'>
    <div class='header'>
            <span><strong>Ticket <span>#$ticket</span></strong></span>
            <img style='width: 150px;'src='./../../assets/img/nidec-ga-logo.png' alt='' srcset=''>
    </div>

    <div style='margin: 25px auto;' class='table'>
    <table>
        <tr>
            <td>Problema</td>
            <td>$Titulo</td>
        </tr>
        <tr>
            <td>Categoria</td>
            <td>$Cat</td>
        </tr>
        <tr>
            <td>Arquivo</td>
            <td>$Arquivo</td>
        </tr>
        <tr>
            <td>Nome do solicitante</td>
            <td>$Nome</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>$Email</td>
        </tr>
        <tr>
            <td>Data da Solicitação</td>
            <td>$DataTicket</td>
        </tr>
        <tr>
            <td colspan='2'>Descrição</td>
        </tr>
        <tr>
            <td style='height: 250px;' colspan='2'>$Desc</td>
        </tr>
    </table>
</div>

<style>
    td, table{
        border: 1px solid black;
        border-collapse: collapsed;
    }
    td{
        padding: 5px 15px; 
        text-align: center;
    }

    @media print{
        .header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        table{
            margin: 0 auto;
        }

        td, table{
            border: 1px solid black;
            border-collapse: collapsed;
        }
        
        td{
            padding: 5px 15px; 
            text-align: center;
        }

        img{
            position: absolute;
            left: 100%
        }
    }
</style>




</div>";