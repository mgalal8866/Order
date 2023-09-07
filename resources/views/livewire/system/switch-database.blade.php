<div>
    <form wire:submit.prevent="switchConnection">
        <label for="connection">Select Database Connection:</label>
        <select wire:model="selectedConnection" id="connection">
            <option value="tenant">Tenant Database</option>
            <option value="tenant2">2Tenant Database</option>
            <option value="mysql">MySQL Database</option>
            <!-- Add more options as needed -->
        </select>
        <button type="submit">Switch Connection</button>
    </form>
</div>
