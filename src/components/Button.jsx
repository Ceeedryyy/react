function Button() {
  function handleClick() {
    window.alert(`Today's date is ${new Date().toLocaleDateString()}`);
  }

  return (
    <button type="button" onClick={handleClick}>
      Show today's date
    </button>
  );
}

export default Button;
