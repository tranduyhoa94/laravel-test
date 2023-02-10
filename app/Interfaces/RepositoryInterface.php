<?php
namespace App\Interfaces;

interface RepositoryInterface
{
    function create(array $attributes);
    function findById(array $attributes);
    function update(array $attributes);
    function delete(array $attributes);
}