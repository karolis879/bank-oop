<div class="container2">
    <div class="form-container2">
        <h1>Sukurti sąskaitą</h1>
        <form action="/saskaitos/store" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vardas</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Įveskite vardą" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pavardė</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="lastName" rows="3" placeholder="Įveskite pavardę" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Asmens kodas</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="PersonId" rows="3" placeholder="Įveskite asmens kodą" required></textarea>
            </div>
            <div>
                <button class="btn btn-dark" type="submit">Sukurti</button>
            </div>
        </form>
    </div>
</div>
