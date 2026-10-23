import './App.css';
import Card from './components/ui/Card';
import Counter from './components/ui/Counter';
import Form from './components/ui/Form';
import List from './components/ui/List';

function App() {
  return (
    <main className="app">
      <h1>Hello po React nga pala</h1>
      <button onClick={() => window.alert('Hello, ako to si alert')}>
        Click me
      </button>
      <List />

      <div className="cards">
        <Card
          name="Cedrick"
          description="This is me"
        />
        <Card
          name="Cedrick"
          description="This is also me"
        />
      </div>
      <Form />
      <Counter />
    </main>
  );
}

export default App;
