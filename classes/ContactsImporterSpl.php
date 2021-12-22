<?php
namespace Classes;

// use Classes\Exceptions\MyException;
use Classes\Exceptions\FileFormatException;
use Classes\Exceptions\SourceFileException;

class ContactsImporterSpl
{
    private  $filename;
    private  $columns;
    private  $fileObject;

    private $result = [];
    private $error = null;

    /**
     * ContactsImporter constructor.
     * @param $filename
     * @param $columns
     */
    public function __construct(string $filename, array $columns)
    {
        $this->filename = $filename;
        $this->columns = $columns;
    }

    public function import()
    {
        if (!$this->validateColumns($this->columns)) {
            throw new FileFormatException("Заданы неверные заголовки столбцов");
        }

        if (!file_exists($this->filename)) {
            throw new SourceFileException("Файл не существует");
        }

        try {
            $this->fileObject = new \SplFileObject($this->filename);
        }
        catch (RuntimeException $exception) {
            throw new SourceFileException("Не удалось открыть файл на чтение");
        }

        $header_data = $this->getHeaderData();

        // print_r($header_data);
        // echo "<br>";
        // print_r($this->columns);

        // if ($header_data !== $this->columns) {
        //     throw new FileFormatException("Исходный файл не содержит необходимых столбцов");
        // }

        foreach ($this->getNextLine() as $line) {
            $this->result[] = $line;
        }
        return $this;
    }

    public function getData():array {
        return $this->result;
    }

    private function getHeaderData():?array {
        $this->fileObject->rewind();
        $data = $this->fileObject->fgetcsv();

        return $data;
    }

    private function getNextLine():?iterable {
        $result = null;

        while (!$this->fileObject->eof()) {
            yield $this->fileObject->fgetcsv();
        }

        return $result;
    }

    private function validateColumns(array $columns):bool
    {
        $result = true;
        if (!$columns) {
            throw new FileFormatException('empty columns');
        }
            foreach ($columns as $column) {
                if(!is_string($column)) {
                    throw new FileFormatException('error columns');
                }
            }
        return $result;
    }
}



?>
