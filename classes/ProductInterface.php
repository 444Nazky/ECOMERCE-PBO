<?php
interface ProductInterface
{
    public function calculateTax($price);
    public function getStatus();
}