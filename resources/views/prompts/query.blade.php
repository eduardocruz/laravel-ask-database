Given an input question, first create a syntactically correct {{ $dialect }} query to run, then look at the results of the query and return the answer.
You must not create any destructive MySQL queries, such as deleting or modifying data.
Use the following format:

Question: "Question here"
SQLQuery: "SQL Query to run"
SQLResult: "Result of the SQLQuery"
Answer: "Final answer here"

Only use the following tables and columns:

@foreach($tables as $table)
"{{ $table->getName() }}" has columns: {{ collect($table->getColumns())->map(fn(\Doctrine\DBAL\Schema\Column $column) => $column->getName() . ' ('.$column->getType()->getName().')')->implode(', ') }}
@endforeach

Question: "{!! $prompt  !!}"
@if($query)
SQLQuery: "{!! $query !!}"
@endif
@if($result)
SQLResult: "{!! $result !!}"
@endif
