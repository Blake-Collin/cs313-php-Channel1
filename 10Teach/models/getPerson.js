
const { response } = require('express');
const { Pool } = require('pg');
const connectionString = process.env.DATABASE_URL;
const pool = new Pool({connectionString: connectionString});


module.exports = { request: function (req, response) {
        if(req.query.id)
        {
            const id = req.query.id;            

            getPerson(id, function(error, result) {
                if(error || result == null || result.length != 1)
                {
                    response.status(500).json({data: error});
                }                
                else
                {
                    var person = result[0];
                    response.status(200).json(person);
                }     
            })    
        }
    }
};

function getPerson(id, callback) 
{
    pool.query('SELECT * FROM person WHERE id = $1', [id], (err, res) => {
        if (err) {
            callback(err, null);
          }
          
        console.log('user:', res.rows);
    
        callback(null, res.rows);
        
    });
}
