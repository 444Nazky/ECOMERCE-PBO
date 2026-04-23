<?php
trait LoggerTrait
{
    public function logAction($message)
    {
        // Mencatat log ke sistem
        error_log("[SMK-PEDIA LOG] " . $message);
    }
}