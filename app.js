const express = require('express');
const mysql = require('mysql2');

var app = express();
app.use(express.json());

var conexion = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'proyecto'
});

conexion.connect(function(error){
    if(error){
        throw error;
    }else{
        console.log('Conexion exitosa');
    }
});

app.get('/', function(req,res){
    res.send('Ruta INICIO');
});

//muestra todos los datos
app.get('/api/usuarios', (req,res)=>{
    conexion.query('SELECT * FROM login', (error,rows)=>{
        if(error){
            throw error;
        }else{
            res.send(rows);
        }
    });
});

//muestra SOLO un dato
app.get('/api/usuarios/:Documento', (req,res)=>{
    conexion.query('SELECT * FROM login WHERE Documento = ?',[req.params.Documento], (error,row)=>{
        if(error){
            throw error;
        }else{
            res.send(row);
        }
    });
});

//muestra SOLO el mail del usuario
app.get('/api/usuarios/:Documento/mail', (req,res)=>{
    conexion.query('SELECT * FROM login WHERE Documento = ?',[req.params.Documento], (error,row)=>{
        if(error){
            throw error;
        }else{
            res.send(row[0].Correo);
        }
    });
});

/* //set datos
app.post('/api/usuarios', (req,res)=>{
    let data = {Documento:req.body.Documento,PrimerN:req.body.PrimerN,SegundoN:req.body.SegundoN,PrimerA:req.body.PrimerA,SegundoA:req.body.SegundoA,Programa:req.body.Programa,Correo:req.body.Correo,Fecha:req.body.Fecha,Celular:req.body.Celular,Genero:req.body.Genero,Contra:req.body.Contra,Categoria:req.body.Categoria};
    let sql = "INSERT INTO login set ?";
    conexion.query(sql,data, function(error, results){
        if(error){
            throw error;
        }else{
            res.send(results);
        }
    })
})*/
 
const puerto = process.env.PUERTO || 3000;

app.listen(puerto, function(){
    console.log("Server OK en el puerto: " + puerto);
});