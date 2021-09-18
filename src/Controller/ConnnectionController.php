<?php

namespace src\Controller;

class ConnnectionController
{
    function __construct()
    {   
        $env = new EnvController();

        $this->con = mysqli_connect(
            $env->Get("HOST"),
            $env->Get("USER"),
            $env->Get("PASSWORD"),
            $env->Get("DATABASE"),
        );

        if (mysqli_connect_errno())
        {
            http_response_code(500);
            echo "{\"error\":true,\"msg\":\"falha na conexao com o banco\"}";
            exit();
        }
    }

    public function column(string $column): void
    {
        if(is_array($column))
            $this->column = join(",",$column);
        else
            $this->column = $column;
    }
    
    public function table(string $table, string $tag = null): void
    {
        if($tag == null)
            $this->table = $table;
        else
        $this->table = $table ." as ".$tag;
    }
    
    public function innerjoin(string $join, string $tag, string $where): void
    {
        $this->join .= "inner join ".$join ." as ". $tag ." on ". $where ." ";
    }
    
    public function leftjoin(string $join, string $tag, string $where): void
    {
        $this->join .= "left join ".$join ." as ". $tag ." on ". $where ." ";
    }

    public function rightjoin(string $join, string $tag, string $where): void
    {
        $this->join .= "right join ".$join ." as ". $tag ." on ". $where ." ";
    }

    public function fulljoin(string $join, string $tag, string $where): void
    {
        $this->join .= "full join ".$join ." as ". $tag ." on ". $where ." ";
    }

    public function where(array $where): void
    {
       $this->where =  "where ". join(" and ", $where);
    }

    public function select(): array
    {
        $response = $this->con->query("select ". $this->column ." from ". $this->table ." ". $this->join ." ". $this->where);
        return mysqli_fetch_all($response, MYSQLI_ASSOC);
    }

    public function reset(): void
    {
        unset($this->column);
        unset($this->table);
        unset($this->join);
        unset($this->where);
    }

}

